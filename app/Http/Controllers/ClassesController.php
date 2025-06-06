<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function listClasses(Request $request) {}
    public function viewClass($id, Request $request) {}
    public function listClassTypes(Request $request) {}
    public function listClassFeatures($id, Request $request) {}
    public function viewClassFeature($id, $featureId, Request $request) {}
    public function listClassSubclasses($id, Request $request) {}
    public function viewClassSubclass($id, $subclassId, Request $request) {}
    public function listSubclassTypes($id, Request $request) {}
    public function listSubclassFeatures($id, $subclassId, Request $request) {}
    public function viewSubclassFeature($id, $subclassId, $featureId, Request $request) {}
}
