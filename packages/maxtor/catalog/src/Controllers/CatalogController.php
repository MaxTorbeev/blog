<?php

namespace MaxTor\Catalog\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CatalogController extends Controller
{

    public function index()
    {
        return 'catalog';
    }

    public function store(Request $request)
    {
        $this->createComment($request);

        return redirect()->route('posts.show', ['id' => $request->post_id]);
    }

    public function update($id, Request $request)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->all());

        return redirect()->route('posts.show', ['id' => $comment->post()->first()->id]);
    }

    public function vote($id, Request $request, Comment $comment, CommentVote $commentVote)
    {
        $comment = $comment->where('id', $id)->firstOrFail();

        $commentVote = $commentVote
            ->where('user_id', Auth::user()->id)
            ->where('comment_id', $id)
            ->first();

        if ($commentVote != null) {
            switch ($request->input('vote')) {
                case 'true':
                    if ($commentVote->vote == 0) {
                        $commentVote->update(['vote' => '1']);
                        $comment->increment('vote');
                        return redirect()->back()->with('message', '������������!');
                    } else {
                        return redirect()->back()->with('message', '�� ��� ������������� ������������!');
                    }
                break;

                case 'false':
                    if ($commentVote->vote == 1) {
                        $commentVote->update(['vote' => '0']);
                        $comment->decrement('vote');
                        return redirect()->back()->with('message', '������������!');
                    } else {
                        return redirect()->back()->with('message', '�� ��� ������������� ������������!');
                    }
                break;
            }
        } else {
            switch($request->input('vote')){
                case('true'): $vote = 1;
                break;
                case('false'): $vote = 0;
                break;
            }
            $comment->commentVote()->insert(['comment_id' => $id, 'user_id'=> Auth::user()->id, 'vote'=> $vote]);

            return redirect()->back()->with('message', '�� ������������� �������!');
        }

        return redirect()->back()->with('message', '����� �������������');
    }

    public function destroy($id, Comment $comment)
    {
        $comments = $comment->where('id', $id)->get();
        foreach ($comments as $comment) {
            return $this->_deleteChild($comment);
        }

        return redirect()->back()->with('message', '������� ������������ ���� �������!');
    }

    public function createComment(Request $request)
    {
        $post = Post::findOrFail($request->post_id);
        $post->comment()->create($request->all());
    }

    private function _deleteChild($comment)
    {
        $comment->where('id', $comment->id)->delete();

        if (count($comment->childrenRecursive) > 0) {
            foreach ($comment->childrenRecursive as $comment) {
                $this->_deleteChild($comment);
                $comment->where('id', $comment->id)->delete();
            }
        }
    }

}
