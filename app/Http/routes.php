<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 *  Default routes
 */
Route::get('/', function () {
    return \Redirect::to('/auth/login');
});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);


Route::get('/home',['middleware' => 'auth', 'as' => 'backend_get_dashboard', function () {
    return view('master.home');
}]);


Route::get('contact-form',[
    'as' => 'contact-get-form',
    'uses' => 'ContactController@getContact'
]);

Route::post('contact-form',[
    'as' => 'contact-post-form',
    'uses' => 'ContactController@postContact'
]);


/**
 *  API routes
 */

Route::group(['prefix' => 'api'], function ()
{

    Route::post('register',[
        'as' => 'api_post_register',
        'uses' => 'ApiController@postRegister'
    ]);

    Route::post('login',[
        'as' => 'api_post_login',
        'uses' => 'ApiController@postLogin'
    ]);

    Route::get('check-login',[
        'as' => 'api_get_check_login',
        'uses' => 'ApiController@getCheckLogin'
    ]);

    Route::get('logout',[
        'as' => 'api_get_logout',
        'uses' => 'ApiController@getLogout'
    ]);

    Route::post('update-user',[
        'as' => 'api_post_update_user',
        'uses' => 'ApiController@postUpdateUser'
    ]);

    Route::get('get-news',[
        'as' => 'api_get_news',
        'uses' => 'ApiController@getNews'
    ]);

    Route::get('get-classes',[
        'as' => 'api_get_classes',
        'uses' => 'ApiController@getClasses'
    ]);

    Route::get('get-tips',[
        'as' => 'api_get_tips',
        'uses' => 'ApiController@getTips'
    ]);

    Route::post('save-issue',[
        'as' => 'api_post_save_issue',
        'uses' => 'ApiController@saveIssue'
    ]);

    Route::get('get-student-list',[
        'as' => 'api_get_student_list',
        'uses' => 'ApiController@getStudentList'
    ]);



    /**
     * Chat Api
     */

    Route::group(['prefix' => 'chat'], function ()
    {
        Route::post('send-message',[
            'as' => 'api_post_send_message',
            'uses' => 'ApiController@sendMessage'
        ]);

        Route::post('read-message',[
            'as' => 'api_post_read_message',
            'uses' => 'ApiController@readMessage'
        ]);

        Route::post('read-thread',[
            'as' => 'api_post_read_thread',
            'uses' => 'ApiController@readThread'
        ]);

        Route::get('get-messages',[
            'as' => 'api_get_messages',
            'uses' => 'ApiController@getMessages'
        ]);
    });

});

/**
 * Backend routes
 */


Route::group(['middleware' => 'auth'], function ()
{


    /**
     * Teachers backend
     */

    Route::get('register-teacher',[
        'as' => 'backend_get_register_teacher',
        'uses' => 'TeacherController@getRegister'
    ]);

    Route::post('register-teacher',[
        'as' => 'backend_post_register_teacher',
        'uses' => 'TeacherController@postRegister'
    ]);

    Route::get('teachers-dashboard',[
        'as' => 'backend_get_teachers_dashboard',
        'uses' => 'TeacherController@getDashboard'
    ]);

    Route::get('teachers-list-json',[
        'as' => 'backend_get_teachers_list_json',
        'uses' => 'TeacherController@getListJson'
    ]);

    Route::get('delete-teacher/{id}',[
        'as' => 'backend_get_delete_teacher',
        'uses' => 'TeacherController@getDeleteTeacher'
    ]);

    Route::get('edit-teacher/{id}',[
        'as' => 'backend_get_edit_teacher',
        'uses' => 'TeacherController@getEditTeacher'
    ]);

    Route::put('edit-teacher',[
        'as' => 'backend_put_edit_teacher',
        'uses' => 'TeacherController@postEditTeacher'
    ]);

    /**
     * Students backend
     */

    Route::get('students-dashboard',[
        'as' => 'backend_get_students_dashboard',
        'uses' => 'StudentController@getDashboard'
    ]);

    Route::get('students-search',[
        'as' => 'backend_get_students_search',
        'uses' => 'StudentController@getStudentByName'
    ]);

    Route::get('students-list-json',[
        'as' => 'backend_get_students_list_json',
        'uses' => 'StudentController@getListJson'
    ]);

    Route::get('delete-student/{id}',[
        'as' => 'backend_get_delete_student',
        'uses' => 'StudentController@getDeleteStudent'
    ]);

    Route::post('send-message',[
        'as' => 'backend_post_send_message',
        'uses' => 'StudentController@postSendMessage'
    ]);

    /**
     * News backend
     */


    Route::get('create-news',[
        'as' => 'backend_get_news_create',
        'uses' => 'NewsController@getCreate'
    ]);

    Route::post('create-news',[
        'as' => 'backend_post_news_create',
        'uses' => 'NewsController@postCreate'
    ]);

    Route::get('news-list-json',[
        'as' => 'backend_get_news_list_json',
        'uses' => 'NewsController@getNewsListJson'
    ]);

    Route::get('news-dashboard',[
        'as' => 'backend_get_news_dashboard',
        'uses' => 'NewsController@getDashboard'
    ]);


    Route::get('news-delete/{id}',[
        'as' => 'backend_get_news_delete',
        'uses' => 'NewsController@getDeleteNews'
    ]);

    Route::get('edit-news/{id}',[
        'as' => 'backend_get_edit_news',
        'uses' => 'NewsController@getEditNews'
    ]);

    Route::put('edit-news',[
        'as' => 'backend_put_edit_news',
        'uses' => 'NewsController@postEditNews'
    ]);

    /**
     * Issues
     */

    Route::get('issues-dashboard',[
        'as' => 'backend_get_issues_dashboard',
        'uses' => 'IssuesController@getDashboard'
    ]);

    Route::get('issues-list-json',[
        'as' => 'backend_get_issues_list_json',
        'uses' => 'IssuesController@getIssuesJson'
    ]);

    Route::get('issue-questions-json/{id}',[
        'as' => 'backend_get_issue_questions_json',
        'uses' => 'IssuesController@getIssueQuestionsJson'
    ]);

    Route::get('issue-questions/{id}',[
        'as' => 'backend_get_issue_questions',
        'uses' => 'IssuesController@getIssueQuestionsDashboard'
    ]);

    Route::get('issue-delete/{id}',[
        'as' => 'backend_get_issue_delete',
        'uses' => 'IssuesController@getDeleteIssue'
    ]);

    Route::get('chat-history/{id}',[
        'as' => 'backend_get_chat_history_dashboard',
        'uses' => 'IssuesController@getChatHistoryDashboard'
    ]);

    Route::get('get-chat-json/{id}',[
        'as' => 'backend_get_chat_history_json',
        'uses' => 'IssuesController@getChatHistoryJson'
    ]);

    Route::get('delete-chat/{id}',[
        'as' => 'backend_get_chat_delete',
        'uses' => 'IssuesController@getDeleteChat'
    ]);

    /**
     * Tips
     */

    Route::group(['prefix' => 'tips'], function ()
    {
        Route::get('create',[
            'as' => 'backend_get_create_tips',
            'uses' => 'TipsController@getCreateTips'
        ]);

        Route::post('create',[
            'as' => 'backend_post_create_tips',
            'uses' => 'TipsController@postCreateTips'
        ]);

        Route::get('dashboard',[
            'as' => 'backend_get_tips_dashboard',
            'uses' => 'TipsController@getDashboard'
        ]);

        Route::get('get-tips-json',[
            'as' => 'backend_get_tips_json',
            'uses' => 'TipsController@getTipsJson'
        ]);

        Route::get('edit/{id}',[
            'as' => 'backend_get_tips_edit',
            'uses' => 'TipsController@getEditTip'
        ]);

        Route::put('edit',[
            'as' => 'backend_put_edit_tips',
            'uses' => 'TipsController@postEditTip'
        ]);

        Route::get('delete/{id}',[
            'as' => 'backend_get_tips_delete',
            'uses' => 'TipsController@getDeleteTip'
        ]);
    });

    Route::get('settings',[
        'as' => 'backend_get_settings',
        'uses' => 'SettingsController@getSettings'
    ]);

    Route::put('settings',[
        'as' => 'backend_post_settings',
        'uses' => 'SettingsController@postSettings'
    ]);

    /**
     * Classes
     */

    Route::group(['prefix' => 'class'], function ()
    {
        Route::get('create',[
            'as' => 'backend_get_class_create',
            'uses' => 'ClassesController@getCreateClass'
        ]);

        Route::post('create',[
            'as' => 'backend_post_create_class',
            'uses' => 'ClassesController@postCreateClass'
        ]);

        Route::get('dashboard',[
            'as' => 'backend_get_classes_dashboard',
            'uses' => 'ClassesController@getClassesDashboard'
        ]);

        Route::get('classes-list-json',[
            'as' => 'backend_get_classes_list_json',
            'uses' => 'ClassesController@getClassesListJson'
        ]);

        Route::get('delete/{classId}',[
            'as' => 'backend_get_class_delete',
            'uses' => 'ClassesController@getDelete'
        ]);

        Route::get('edit/{classId}',[
            'as' => 'backend_get_class_edit',
            'uses' => 'ClassesController@getEdit'
        ]);

        Route::put('edit',[
            'as' => 'backend_put_class_edit',
            'uses' => 'ClassesController@putEdit'
        ]);
    });

});
