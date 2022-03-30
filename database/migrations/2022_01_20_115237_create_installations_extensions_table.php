<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallationsExtensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installations_extensions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('company_id')->unsigned();
            $table->integer('extension_id')->unsigned();
            $table->string('zapikey')->nullable();
            $table->boolean('active')->default(1);
            $table->enum('plan', ['free', 'paid'])->default('free');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->cascadeOnDelete();

            $table->foreign('extension_id')
                ->references('id')
                ->on('extensions')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('installations_extensions');
    }
}
