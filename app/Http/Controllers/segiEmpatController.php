<?php

namespace App\Http\Controllers;

use App\Models\Balok;
use App\Models\segiEmpat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class segiEmpatController extends Controller
{
    public function inputSegiEmpat()
    {
        return View::make('segi-empat.inputSegiEmpat');
    }

    public function inputBalok()
    {
        return View::make('segi-empat.inputBalok');
    }

    public function hasilBalok(Request $request)
    {
        $balok = new Balok();

        $rules = [
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
            'tebal' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return View::make('segi-empat.inputBalok', compact('balok'))->with($validator);
        } else {
            $balok->panjang = $request->panjang;
            $balok->lebar = $request->lebar;
            $balok->tebal = $request->tebal;
        }

        return View::make('segi-empat.hasilBalok', compact('balok'));
    }

    public function hasil(Request $request)
    {
        $segiEmpat = new segiEmpat();

        $rules = [
            'panjang' => 'required|numeric',
            'lebar' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return View::make('segi-empat.inputSegiEmpat', compact('segiEmpat'))->with($validator);
        } else {
            $segiEmpat->panjang = $request->panjang;
            $segiEmpat->lebar = $request->lebar;
        };
        return View::make('segi-empat.hasil', compact('segiEmpat'));
    }
}
