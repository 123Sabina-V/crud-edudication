 <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateEmployeesTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('employees', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->foreign('user_id')->references('id')->on('users');
                $table->unsignedBigInteger('company_id');
                $table->foreign('company_id')->references('id')->on('companies');
                $table->boolean('active')->default(1);
                $table->string('first_name', 150);
                $table->string('last_name', 150);
                $table->string('phone', 40);
                $table->string('email', 150);
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
            Schema::dropIfExists('employees');
        }
    }
