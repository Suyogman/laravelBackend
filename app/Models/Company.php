<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class Company extends Model
{
    use HasFactory, SoftDeletes;
   
    protected $visible = [
        'id',
        'name',
        'email',
        'address',
        'phone number',
        'company_full_address'
    ];

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone number',
        'started_at'
    ];
     

    protected $appends = [ 
        'company_full_address'
    ];

    public function employees(){
        return $this->hasMany(Employee1::class);
    }
    // protected $attributes = [
    //     'user_id' => 1
    // ];

    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }

    public function getNameAttribute($value){
        return strtoupper($value);
    }
    public function getCompanyFullAddressAttribute(){
        return $this->name . ' ' . $this->address;
    }

    public function validate(){
       $data =$this->getAttributes();

       $baseRules =[
        'name' => 'required|string|unique:'.$this->getTable().',name,'.$this->id.',id',
        'email' => 'required|email',
        'address' => ['required','string','min:10'],
        //'started_at' => 'required|date_format:y-m-d',
       ];

       $customMessages = [
        'name.unique' => 'Name should be of only max 10 characters',
       ];

       $validator = Validator::make($data, $baseRules, $customMessages);

       $errors = null;

       if($validator->fails()){
        $errors = $validator->errors();
       }

       if($errors && $errors->count() > 0){
         throw new ValidationException($validator);
       }
       

       return $this;
    }

}