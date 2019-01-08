<?php
/**
 * Created by PhpStorm.
 * User: cristianoprea
 * Date: 23/09/15
 * Time: 13:15
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class ReportQuestion extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'issue_report_questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['question' , 'answer' , 'issue_report_id'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(IssueReport::class, 'issue_report_id');
    }

}