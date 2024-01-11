<?php

$lang = json_decode(Illuminate\Support\Facades\Storage::disk('lang')->get('fr.json'),true);
return $lang;



