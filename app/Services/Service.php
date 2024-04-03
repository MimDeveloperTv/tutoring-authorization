<?php 

namespace App\Services;
class Service{
    private $data = null;
    private $errors = null;
    private $status = 200;
    
    protected function setData($data) : void
    {
        $this->data = $data;
    } 
    protected function setStatus($status) : void
    {
        $this->status = $status;
    }
    protected function setErrors($errors) : void 
    {
        $this->errors = $errors;
    }

    public function response()
    {
        return response()->json([
          'data' => $this->data,
          'errors' => $this->errors,
          'status' => $this->status 
        ],$this->status);
    }
}