<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassInfo;
use App\Models\Subclass;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClasses(Request $request) {
        $classes = ClassInfo::all()->map(function($class) {
            return [
                'class_id' => $class->class_id,
                'name' => $class->name,
                'description' => $class->description,
                'subclass_level' => $class->subclass_level
            ];
    });

    return response()->json($classes);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewClass($id, Request $request) {
        // Busca la clase y carga sus subclases y features
        $class = ClassInfo::with(['subclasses'])->find($id);

        if (!$class) {
            return response()->json([
                'message' => 'Clase no encontrada'
            ], 404);
        }

        $subclasses = $class->subclasses->map(function($subclass) {
            return [
                'subclass_id' => $subclass->subclass_id,
                'name' => $subclass->name,
                'description' => $subclass->description
            ];
        });

        return response()->json([
            'class_id' => $class->class_id,
            'name' => $class->name,
            'description' => $class->description,
            'subclass_level' => $class->subclass_level,
            'subclasses' => $subclasses
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listClassTypes(Request $request) {
        // Obtiene todas las clases y devuelve solo id y name
        $types = ClassInfo::all()->map(function($class) {
            return [
                'class_id' => $class->class_id,
                'name' => $class->name
            ];
        });

        return response()->json($types);
    }
    /**
     * Display a listing of the features of a class.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listClassFeatures($id, Request $request) {
        // Busca la clase y carga sus features con el nivel pivot
        $class = ClassInfo::with(['features'])->find($id);

        if (!$class) {
            return response()->json([
                'message' => 'Clase no encontrada'
            ], 404);
        }

        $features = $class->features->map(function($feature) {
            return [
                'feature_id' => $feature->feature_id,
                'name' => $feature->name,
                'description' => $feature->description,
                'level' => $feature->pivot->level ?? null
            ];
        });

        return response()->json($features);
    }
    /**
     * Display a specific feature of a class.
     *
     * @param  int  $id
     * @param  int  $featureId
     * @return \Illuminate\Http\Response
     */
    public function viewClassFeature($id, $featureId, Request $request) {
        // Busca la clase y carga el feature específico con el nivel pivot
        $class = ClassInfo::with(['features' => function($query) use ($featureId) {
            $query->where('feature.feature_id', $featureId);
        }])->find($id);

        if (!$class) {
            return response()->json([
                'message' => 'Clase no encontrada'
            ], 404);
        }

        $feature = $class->features->first();

        if (!$feature) {
            return response()->json([
                'message' => 'Feature no encontrada en esta clase'
            ], 404);
        }

        return response()->json([
            'feature_id' => $feature->feature_id,
            'name' => $feature->name,
            'description' => $feature->description,
            'level' => $feature->pivot->level ?? null
        ]);
    }
    /**
     * Display a listing of the subclasses of a class.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listClassSubclasses($id, Request $request) {
        // Busca la clase y carga sus subclases
        $class = ClassInfo::with('subclasses')->find($id);

        if (!$class) {
            return response()->json([
                'message' => 'Clase no encontrada'
            ], 404);
        }

        $subclasses = $class->subclasses->map(function($subclass) {
            return [
                'subclass_id' => $subclass->subclass_id,
                'name' => $subclass->name,
                'description' => $subclass->description
            ];
        });

        return response()->json($subclasses);
    }
    /**
     * Display a specific subclass of a class.
     *
     * @param  int  $id
     * @param  int  $subclassId
     * @return \Illuminate\Http\Response
     */
    public function viewClassSubclass($id, $subclassId, Request $request) {
        // Busca la subclase que pertenece a la clase indicada (sin cargar features)
        $subclass = Subclass::where('class_id', $id)
            ->find($subclassId);

        if (!$subclass) {
            return response()->json([
                'message' => 'Subclase no encontrada'
            ], 404);
        }

        return response()->json([
            'subclass_id' => $subclass->subclass_id,
            'class_id' => $subclass->class_id,
            'name' => $subclass->name,
            'description' => $subclass->description
        ]);
    }
    /**
     * Display a listing of the types of a subclass.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function listSubclassTypes($id, Request $request) {
        $types = Subclass::where('class_id', $id)
            ->whereNotNull('type')
            ->distinct()
            ->pluck('type');

        return response()->json($types);
    }
    /**
     * Display a listing of the features of a subclass.
     *
     * @param  int  $id
     * @param  int  $subclassId
     * @return \Illuminate\Http\Response
     */
    public function listSubclassFeatures($id, $subclassId, Request $request) {
        // Busca la subclase y carga sus features con el nivel pivot
        $subclass = Subclass::with('features')->where('class_id', $id)->find($subclassId);

        if (!$subclass) {
            return response()->json([
                'message' => 'Subclase no encontrada'
            ], 404);
        }

        $features = $subclass->features->map(function($feature) {
            return [
                'feature_id' => $feature->feature_id,
                'name' => $feature->name,
                'description' => $feature->description,
                'level' => $feature->pivot->level ?? null
            ];
        });

        return response()->json($features);
    }
    /**
     * Display a specific feature of a subclass.
     *
     * @param  int  $id
     * @param  int  $subclassId
     * @param  int  $featureId
     * @return \Illuminate\Http\Response
     */
    public function viewSubclassFeature($id, $subclassId, $featureId, Request $request) {
        // Busca la subclase y carga el feature específico con el nivel pivot
        $subclass = Subclass::with(['features' => function($query) use ($featureId) {
            $query->where('feature.feature_id', $featureId);
        }])->where('class_id', $id)->find($subclassId);

        if (!$subclass) {
            return response()->json([
                'message' => 'Subclase no encontrada'
            ], 404);
        }

        $feature = $subclass->features->first();

        if (!$feature) {
            return response()->json([
                'message' => 'Feature no encontrada en esta subclase'
            ], 404);
        }

        return response()->json([
            'feature_id' => $feature->feature_id,
            'name' => $feature->name,
            'description' => $feature->description,
            'level' => $feature->pivot->level ?? null
        ]);
    }
}
