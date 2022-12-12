<?php

namespace App\Http\Controllers;
use App\Models\Quacks;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       
        
      
        $comment = Comment::all();
        return view('comment.index', compact('comment'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $quacks = Quacks::all();
        return view('comment.create',compact('quacks'));
    }
    public function createComment($id)
    {
        $quack = Quacks::findOrFail($id);
        // dd($idquack);
        return view('comment.createComment', compact('quack'));

    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
            'quack_id' => 'required',
                      
        ]);
        Comment::create([
            'content' => $request->content,
            'image' => $request->image,
            'tags' => $request->tags,
            'quack_id' => $request->quack_id,
          
            ]);
           
            return redirect()->route('index')
            ->with('success', 'Commentaire ajouté avec succès !');



           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Comment::findOrFail($id);
        return view('comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateComment = $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
           
           
            ]);

            Comment::whereId($id)->update($updateComment);
            return redirect()->route('comment.index')
            ->with('success', 'Le comment mis à jour avec succès !');

            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect('/comment')->with('success', 'Comment supprimé avec succès');
    }
}
