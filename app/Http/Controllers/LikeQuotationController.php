<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeQuotationRequest;
use App\Models\likeQuotation;
use Illuminate\Http\Request;
use Exception;

class LikeQuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //code pour afficher tous les citations likées doit être écrit ici
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LikeQuotationRequest $request)
    {
        if (!auth()->check()) {
            return response()->json([
                'status_code' => 401,
                'status_message' => 'Vous devez être connecté pour liker une citation.'
            ], 401);
        }
            try {
                $likedquotation = likeQuotation::create([
                'user_id'=> auth()->id(),
                'quotation_id' => $request->quotation_id,
                ]);
    
                

                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Votre like pour cette citation est enregistré',
                    'data' => $likedquotation
                ]);
            } catch (Exception $e) {
                return response()->json([
                   
                        'status_code' => 500,
                        'status_message' => 'Une erreur est survenue lors de l\'enregistrement du like.',
                        'error' => $e->getMessage()
                    
                ]);
            }
        }
       
    

    /**
     * Display the specified resource.
     */
    public function show(likeQuotation $likeQuotation)
    {
        //code pour afficher une citation en particulier que j'ai liké
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(likeQuotation $likeQuotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, likeQuotation $likeQuotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(likeQuotation $likeQuotation)
    {
         //code pour déliker les citations et enregistrer les données dans la DB doit être écrit ici

         {
            try {
                $likeQuotation->delete();
    
                return response()->json([
                    'status_code' => 200,
                    'status_message' => 'Votre like a été supprimé pour cette citation',
                    'data' => $likeQuotation
                ]);
            } catch (Exception $e) {
                return response()->json($e);
            }
        }
    }
}
