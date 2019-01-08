<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableIssueReportQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issue_report_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question',999);
            $table->string('answer',999);
            $table->integer('issue_report_id')->unsigned()->nullable();
            $table->foreign('issue_report_id')->references('id')->on('issue_reports')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issue_report_questions');
    }
}
