<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateQuoteRequest;
use App\Http\Requests\EditQuotationRequest;
use App\Models\Category;
use App\Models\Quotations;
use Exception;
use Illuminate\Http\Request;

class QuotationsController extends Controller
{

    public function index()
    {
        try {
            $quotations = Quotations::join('categories', 'categories.id', '=', 'quotations.category_id')
                ->get(['quotations.id', 'quotations.content', 'quotations.author', 'categories.type']);

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La liste des citations a été récupérée',
                'data' => $quotations
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    public function paginateQuotations(Request $request)
    {
        try {

            $perpage = $request->input('perPage', 9);

            $quotations = Quotations::join('categories', 'categories.id', '=', 'quotations.category_id')
                ->select(['quotations.content', 'quotations.author', 'categories.type'])
                ->paginate($perpage);

            return response()->json($quotations);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function getByCategory(Request $request, $category)
    {
        try {
            $perpage = $request->input('perpage', 3);

            $validCategory = Category::where('type', $category)->exists();
            if (!$validCategory) {
                return response()->json([
                    'status.code' => 404,
                    'status.message' => 'Cette catégorie n\'existe pas.'
                ]);
            }

            $quotations = Quotations::join('categories', 'categories.id', '=', 'quotations.category_id')
                ->select(['quotations.content', 'quotations.author', 'categories.type'])
                ->where('categories.type', $category)
                ->paginate($perpage);
                
          


            return response()->json($quotations);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }


    public function show (Request $request, $id){

        try {
            $display = $request->input($id);

            $validId = Quotations::where('id', $id)->exists();
            if (!$validId) {
                return response()->json([
                    'status.code' => 404,
                    'status.message' => 'Cette citation n\'existe pas.'
                ]);
            }
            $quotation = Quotations::find($id);

            return  response()->json([
                'status.code' => 200,
                'status.message' => 'La citation a été récupérée',
                'data' => $quotation

            ]);
        } catch (Exception $e) {
        
            return response()->json($e);
        }



    }

    /**
     * Show the form for creating a new resource.
     */

    public function create() {}


    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateQuoteRequest $request)
    {
        try {
            $quotation = new Quotations();

            $quotation->content = $request->content;
            $quotation->author = $request->author;
            $quotation->category_id = $request->category_id;

            $quotation->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La nouvelle citation a été enregistrée',
                'data' => $quotation
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotations $quotations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditQuotationRequest $request, Quotations $quotation)
    {

        try {

            $quotation->content = $request->content;
            $quotation->author = $request->author;
            $quotation->category_id = $request->category_id;

            $quotation->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La citation a été mise à jour',
                'data' => $quotation
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotations $quotation)
    {
        try {
            $quotation->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La citation a été supprimée',
                'data' => $quotation
            ]);
        } catch (Exception $e) {
            return response()->json($e);
        }
    }
}
