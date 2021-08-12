<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contract;
class contractController extends Controller
{
    public function store(Request $request)
    {
        $contract = contract::create([
            //$ArticlePost = DB::table('article_posts')->insert([
                'tenHopDong'=>$request->tenHopDong,
                'loaiHopDong'=>$request->loaiHopDong,
                'duAn'=>$request->duAn,
                'giaTriHD'=>$request->giaTriHD,
                'nhanSuLienQuan'=>$request->nhanSuLienQuan,
                'batDau'=>$request->batDau,
                'ketThuc'=>$request->ketThuc,
                'donVi'=>$request->donVi,
                'khoiLuong'=>$request->khoiLuong,
        ]);
        if($contract) {
            return response()->json([
                'success' => true,
                'msg' => 'Tạo hợp đồng thành công',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'msg' => 'Tạo hợp đồng không thành công',
            ]);
        }
    }

    public function show ()
    {
        $contract = contract::paginate(20);
        // $posts = auth()->user()->posts;

        return response()->json($contract);
    }
}