<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 17/09/15
 * Time: 17:02
 */

namespace App\Services;

use App\FlashAlert;
use App\User;
use App\UserType;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;

class TeacherService implements TeacherServiceContract
{

    public function createTeacher($request)
    {
        $errorMessage = '';
        $message= "U moet het volgende invullen: ";
        if(!$request->get('name'))
        {
            $errorMessage.='the teacher name ';
        }
        if(!$request->get('email'))
        {
            if($errorMessage!='')
            {
                $errorMessage.=',the teacher username ';
            }
            else
            {
                $errorMessage.='the teacher username ';
            }
        }
        if(!$request->get('password'))
        {
            if($errorMessage!='') {
                $errorMessage .= ',the teacher password ';
            }
            else
            {

                $errorMessage .= 'the teacher password ';
            }

        }
        if(!$request->get('class_id'))
        {
            if($errorMessage!='') {
                $errorMessage .= ',the teacher class ';
            }
            else
            {

                $errorMessage .= 'the teacher class ';
            }

        }

        $image = $request->file('image');
        if(!$image)
        {
            if($errorMessage!='')
            {
                $errorMessage.=',the teacher picture ';
            }
            else
            {
                $errorMessage.='the teacher picture ';
            }
        }

        if($errorMessage!='')
        {
            FlashAlert::errorMessage($message.$errorMessage.'!');
            return false;
        }

        $file = $request->file('image');
        $destinationPath = 'uploads';
        $extension = $file->getClientOriginalExtension();
        $fileName = $request->get('name') . rand(11111, 99999) . '.' . $extension;
        $file->move($destinationPath, $fileName);

        $pictureAddress = $destinationPath . '/' . $fileName;
        $picture = Image::make($pictureAddress)->fit(500, 400);
        $picture->save($pictureAddress);


        $teacher = new User($request->all());
        $teacher->password = \Hash::make($request->get('password') );
        $teacher->type = UserType::$teacher;
        $teacher->class_id = $request->get('class_id');
        $teacher->photo = $destinationPath.'/'.$fileName;
        try{

            $teacher->save();
        }
        catch (QueryException $e)
        {
            FlashAlert::errorMessage('The username already exists!');
            return false;
        }
        FlashAlert::successfulMessage('The teacher was created!');
        return true;
    }

    public function getTeachersList($sord, $page, $rows)
    {
        Paginator::currentPageResolver(function() use ($page) {
            return $page;
        });
        $teachers = User::where(['type' => UserType::$teacher])->paginate($rows)->toArray();
        return $teachers;
    }

    public function deleteTeacher($teacherId)
    {
        $teacher = User::find($teacherId);
        try
        {
            if($teacher)
            {
                if($teacher->type == UserType::$teacher)
                {
                    $name = $teacher->name;
                    $teacher->delete();
                }
                else
                {
                    FlashAlert::errorMessage('Can\'t find teacher!');
                    return false;
                }
            }
            else
            {
                FlashAlert::errorMessage('Can\'t find teacher!');
                return false;
            }
        }
        catch(QueryException $e)
        {
            FlashAlert::errorMessage('Can\'t find teacher!');
            return false;
        }
        FlashAlert::successfulMessage('Teacher '.$name.' was successfully deleted!');
        return true;
    }

    public function getTeacherById($teacherId)
    {
        $teacher = User::find($teacherId);
        if($teacher)
        {
            if($teacher->type == UserType::$teacher)
            {
                return $teacher;
            }
            else
            {
                FlashAlert::errorMessage('Can\'t find teacher!');
                return false;
            }
        }
        else
        {
            FlashAlert::errorMessage('Can\'t find teacher!');
            return false;
        }
    }

    public function postEditTeacher($request)
    {
        $updated = false;
        $teacher = User::find($request->get('id'));
        if($teacher)
        {
            if($teacher->type == UserType::$teacher)
            {
                if($request->get('name'))
                {
                    $teacher->name = $request->get('name');
                    $updated = true;
                }
                if($request->get('email'))
                {
                    $teacher->email = $request->get('email');
                    $updated = true;
                }
                if($request->get('password'))
                {
                    $teacher->password = \Hash::make($request->get('password') );
                    $updated = true;
                }
                if($request->get('class_id'))
                {
                    $teacher->class_id = $request->get('class_id');
                    $updated = true;
                }
                $image = $request->file('image');
                if($image)
                {
                    $destinationPath = 'uploads';
                    $extension = $image->getClientOriginalExtension();
                    $fileName = $request->get('name') . rand(11111, 99999) . '.' . $extension;
                    $image->move($destinationPath, $fileName);

                    $pictureAddress = $destinationPath . '/' . $fileName;
                    $picture = Image::make($pictureAddress)->fit(500, 400);
                    $picture->save($pictureAddress);
                    $teacher->photo = $destinationPath.'/'.$fileName;
                    $updated = true;
                }

                if($updated)
                {
                    $teacher->update();
                    FlashAlert::successfulMessage('The teacher was updated!');
                }
                return true;
            }
            else
            {
                FlashAlert::errorMessage('Can\'t find teacher');
                return false;

            }
        }
        else
        {
            FlashAlert::errorMessage('Can\'t find teacher');
            return false;
        }
    }
}