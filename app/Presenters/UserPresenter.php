<?php

namespace App\Presenters;

use App\Services\Imagen;
use Illuminate\Support\Facades\Storage;

class UserPresenter extends Presenter
{
  private $folderImg = 'photo_users';
  private $imgDefault = '/images/avatar.png';

  // public function getPhoto(){
  //   try {
  //     if($this->model->photo == $this->imgDefault){
  //       return $this->imgDefault;
  //     }
  //     return Storage::url("{$this->folderImg}/{$this->model->photo}");
  //   } catch (\Throwable $th) {
  //     return $this->imgDefault;
  //   }
  // }

  public function getPhoto(){
    return (new Imagen($this->model->photo, $this->folderImg, $this->imgDefault))->call();
  }


  // public function getFullName(){
  //   return "{$this->model->first_name} {$this->model->last_name}";
  // }
}
