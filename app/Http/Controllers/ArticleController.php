<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function index()
    {
 //      $articles = Article::all();
 //      $articles_with_relation = Article::with('user')->get();
 //      dd($articles,$articles_with_relation);

        // Retrieve all articles along with their associated user and categories
        $articles = Article::with(['user', 'categories'])->get();

         //$articles = Article::with('user')->get(); 

        //return the articles to the view 
        return view('articles/index',compact('articles'));
    }

    public function attachCategory(Request $request, $articleId)
    {
        //Find the article by ID
        $article = Article::findOrFail($articleId);

        //Attach a single category to the article 
        $category = Category::find($request->category_id);
        if ($category) {
            $article->categories()->attach($category->id);
            return redirect()->back()->with('message, category attached successfully!');
        }

        return redirect()->back()->with(error, 'Category not found.');

    }

    public function detachCategory($articleId, $categoryId)
    {
        //Find the article by ID
        $article = Article::findOrFail($articleId);

        //Detach the category from the article
        $article->categories()->detach($categoryId);

        //Redirect back with a success message
        return redirect()->back()->with('message', 'Category detached successfully!');
    }

    public function showCategories($articleId)
    {
        // Get all categories of an article
        $article = Article::findOrFail($articleId);
        $categories = $article->categories;

        return view('articles.categories', compact('article', 'categories'));
    }

    public function showArticles($categoryId)
    {
        // Get all articles for a category
        $category = Category::findOrFail($categoryId);
        $articles = $category->articles;

        //Return the articles to the view 
        return view('categories.articles', compact('category', 'articles'));
    }
}

