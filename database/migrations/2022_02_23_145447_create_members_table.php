<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->date('dob');
            $table->string('gender');
            $table->string('avatar')->nullable();
            $table->string('belt');
            $table->string('membership');
            $table->date('member_since');
            $table->string('emergency_contact');
            $table->string('emergency_number');
            $table->text('medical_information')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
