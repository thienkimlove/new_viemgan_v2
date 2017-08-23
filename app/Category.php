<?php namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;


class Category extends Model  {

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
                'source' => 'name'
            ]
        ];
    }

	protected $fillable = [
        'name',
        'parent_id',
        'template',
        'slug',
        'display_below',
        'display_homepage_0',
        'display_homepage_1',
        'display_homepage_2',
        'display_homepage_3',
        'seo_name',
        'seo_desc'
    ];


    /**
     * parent of this category
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        //return $this->belongsTo(Category::class, 'parent_id', 'id');
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    /**
     * sub of this category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');

    }
    /**
     * category have many posts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
       return $this->hasMany(Post::class)->where('status', true);
    }

    /**
     * category have many posts.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function latestThreePosts()
    {
        return $this->hasMany(Post::class)->where('status', true)->latest()->limit(3);
    }

}
