<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Delivery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeliveryController extends Controller
{
    public function orderDelivery(Request $request)
    {
        $request->validate([
            'note' => 'required|max:155', 
            'attachment' => 'required|max:20480' 
        ]);

        

        $delivery = Delivery::create([
            'seller_id'       => $request->seller_id,
            'buyer_id'        => $request->buyer_id,
            'post_id'         => $request->post_id,
            'note'            => $request->note,
        ]);


        $document = $request->file('attachment');
        if($document){
            $extension = $document->getClientOriginalExtension();
            $fileNameToStore = Str::random(3).'.'.$extension; // Filename to store
            $destinationPath = 'files/delivery';
            $document->move(public_path($destinationPath), $fileNameToStore);
            $delivery->attachment = 'files/delivery/'.$fileNameToStore;
            $delivery->save();
        }
        
        toastr()->success('', 'Livraison de la commande réussie!');
        return redirect()->back();
    }

    public function downloadDeliveryAttachment($id)
    {
        $file = Delivery::whereId($id)->first();
        return response()->download(public_path($file->attachment));
        toastr()->success('', 'Pièce jointe téléchargée avec succès!');
    }
}
