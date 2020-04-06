<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setupchange extends Model
{
    protected $fillable = [
         'encryption','logouttime','loginfail','uploadtype','uploadsize','picturetype','picturesize','headpastesize','headpastewidth','headpasteheight','photeuploadnumber'
    ];
}
