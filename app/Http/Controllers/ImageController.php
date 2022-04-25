<?php
class ImageController extends Controller
{
    public function index() {
        return view('images.index');
        dd($image);
    }
}