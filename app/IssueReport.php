<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 23/09/15
 * Time: 13:14
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class IssueReport extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'issue_reports';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'user_id'];


    public function questions()
    {
        return $this->hasMany(ReportQuestion::class, 'issue_report_id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}