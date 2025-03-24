<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Teacher;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::with('teacher')->where('stop_flg', 0)->get();
        $layerCounts = [
            '1' => $members->where('layer', 1)->where('stop_flg', 0)->count(),
            '2' => $members->where('layer', 2)->where('stop_flg', 0)->count(),
            '3' => $members->where('layer', 3)->where('stop_flg', 0)->count(),
            '4' => $members->where('layer', 4)->where('stop_flg', 0)->count(),
            '5' => $members->where('layer', 5)->where('stop_flg', 0)->count(),
        ];

        // 非アクティブの人数（statusが1の場合）
        $inactiveCount = $members->where('stop_flg', 1)->count();

        // ビューにデータを渡す
        return view('home', [
            'members' => $members,
            'layerCounts' => $layerCounts,
            'inactiveCount' => $inactiveCount,  // 非アクティブ人数も渡す
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        return \view('member/member_create', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Member::create([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'base' => $request->base,
            'unit' => $request->unit,
            'layer' => $request->layer,
            'date' => $request->date,
        ]);

        // 成功メッセージをセッションに保存し、'post.create' ルートにリダイレクト
        return redirect()->route('member.create')->with('success', '人材が追加されました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        $teachers = Teacher::all();
        return view('member/member_show', [
            'member' => $member,
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {

        $teachers = Teacher::all();
        return view('member/member_edit', [
            'member' => $member,
            'teachers' => $teachers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $member->update([
            'name' => $request->name,
            'teacher_id' => $request->teacher_id,
            'base' => $request->base,
            'unit' => $request->unit,
            'layer' => $request->layer,
            'date' => $request->date,
            'comment' => $request->comment,
        ]);

        return redirect()->route('member.show', $member->id);
    }


    public function active(Request $request, Member $member)
    {
        $member->update([
            'stop_flg' => 0, // statusを1に更新
        ]);
        return redirect()->route('member.show', $member->id)->with('success', 'アクティブにしました');
    }

    public function stop(Request $request, Member $member)
    {
        $member->update([
            'stop_flg' => 1, // statusを1に更新
        ]);
        return redirect()->route('member.show', $member->id)->with('success', '非アクティブにしました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }
}
