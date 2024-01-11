<?php

$lang = json_decode(Illuminate\Support\Facades\Storage::disk('lang')->get('en.json'),true);
return $lang;



