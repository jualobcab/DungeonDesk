<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function listCampaignDiary($id, Request $request) {}
    public function viewDiaryEntry($id, $entryId, Request $request) {}
    public function createDiaryEntry($id, Request $request) {}
    public function updateDiaryEntry($id, $entryId, Request $request) {}
    public function deleteDiaryEntry($id, $entryId, Request $request) {}
}
