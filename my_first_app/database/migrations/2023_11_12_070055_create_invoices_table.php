<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->decimal('amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->decimal('tax_percentage', 5, 2);
            $table->decimal('tax_amount', 10, 2);
            $table->decimal('net_amount', 10, 2);
            $table->string('customer_name');
            $table->date('invoice_date');
            $table->string('file')->nullable();
            $table->string('customer_email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
