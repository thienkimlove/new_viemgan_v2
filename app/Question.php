<?php namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Question extends Model {

    use Sluggable;
    use SluggableScopeHelpers;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

	protected $fillable = [
	    'question',
        'answer',
        'image',
        'title',
        'person',
        'short_answer',
        'status',
        'slug'
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * get the list tags of current post.
     * @return mixed
     */
    public function getTagListAttribute()
    {
        return $this->tags->pluck('name')->all();
    }

    public function getRelatedPostsAttribute()
    {
        $limit = 5;

        $question_tag = $this->tags->pluck('id')->all();

        $relatedPosts = Post::where('status', true)
            ->whereHas('tags', function($q) use ($question_tag){
                $q->whereIn('id', $question_tag);
            })
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->get();

        $additionPosts = null;

        if ($relatedPosts->count() < $limit) {
            $resLimit = $limit - $relatedPosts->count();
            $additionPosts = Post::where('status', true)
                ->orderBy('created_at', 'desc')
                ->limit($resLimit)
                ->get();
        }
        if ($additionPosts) {
            foreach ($additionPosts as $post) {
                if (!in_array($post->id, $relatedPosts->pluck('id')->all())) {
                    $relatedPosts->push($post);
                }
            }
        }

        return $relatedPosts;
    }

}
