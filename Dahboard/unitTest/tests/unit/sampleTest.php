<?php
use PHPUnit\Framework\TestCase;
require_once dirname(dirname(__FILE__)) .'../../../database/DBClass.php';
use DbClass\Table;


class SampleTest extends TestCase
{
    private $table;

    protected function setUp() : void{
        $this->table = new Table('users');
    }

    public function testFindAllFunction(){
        $expect ="mohamedahmed@gmail.com";
        $result = $this->table->FindAll("user_role='0'");
        $this->assertEquals($expect,$result['0']['user_email']);
    }

    public function testFindByIdFunction(){
        $expect ='Mohamed Ali';
        $result = $this->table->FindById("user_id","161");
        $this->assertEquals($expect,$result['user_name']);
    }

    public function testIfFindByIdNegitaveNumber(){

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("is not Found");
        $result = $this->table->FindById("user_id","-161");
    }
    

    public function testDeletefunction(){

        $invalidTable = new Table('InvalidTable');

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("cant found this table");

        $result = $invalidTable->Delete("user_name","Eslam Mahmoud");
        
    }
    
    public function testInputdataFunction(){

        $result = $this->table->inputData("  </b>hello world</b>");
        $expect= "&lt;/b&gt;hello world&lt;/b&gt;";
        $this->assertEquals($expect,$result);
    }

    public function testEmptyInputdate(){
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("The input  is empty");
        $result = $this->table->inputData("");
    
    }

    public function testCreateFunction(){
        $newUser=[
            'user_name'=>'testName',
            'user_email'=>'testEmail@gmail.com',
            'user_password'=>'Pa$$w0rd!',
            'user_phone'=>'01122555210',
            'user_role'=>'0',
        ];
        $result = $this->table->Create($newUser);
        $this->assertTrue($result);
    }

    public function testUpdateFunction(){
        $newUser=[
            'user_name'=>'testNameUpdate',
            'user_email'=>'testEmailUpdate@gmail.com',            
        ];
        $result = $this->table->Update($newUser,'user_id','407');
        $this->assertTrue($result);
    }

    public function testLoginfunction(){
        $expect = [
            'user_email'=>"mohamedahmed@gmail.com",
            'user_password'=>"123",
            'user_role'=>"0",
        ];
        $result = $this->table->Login('mohamedahmed@gmail.com','123','0');
        $this->assertEquals($result['user_email'],$expect['user_email']);
    }

    public function testLoginInvalidEmailOrPassword(){
        
        $this->expectException(Exception::class);
        $this->expectExceptionMessage("email or passwor is not valid");
        $result = $this->table->Login('invalidemail@gmail.com','123','0');
        
    }
}
?>

