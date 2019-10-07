# Simple mysql query builder

Class php for build mysql querys

## Status

- Select, update, insert and delete querys can be builded
- Join option will be added soon

## Installation

Clone or download this repository

```terminal
    git clone git@github.com:jesusgm/mysql-query-builder.git
```

and include or require the query.class.php to use it

```php
include "query.class.php";
```

## Usage

### Selecting data

```php
    // Include class
    include "query.class.php";

    // Create instance
    $query = new Query();

    $query->select();   //Type of query: select() || update() || insert() || delete()
    $query->table("posts"); // Set the table
    $query->columns(array("id", "title", "slug"));  // Set the columns to return. Default *
    $query->where(array("`title` LIKE '%keywordtofind%'"));   // Set query filter. Array elements will be concatenated by AND
    $query->orWhere(array("`id` = 1", "`id` = 2"));   // Set query filter. Array elements will be concatenated by OR
    $query->limit("1,10");  // Set limit of results or paginate
    $query->order("date DESC"); // Set order of result

    echo $query->build();   // Build and returns a query string
```

Returns:

```sql
    SELECT `id, title, slug`
    FROM `posts`
    WHERE (title LIKE '%keywordtofind%') AND (`id` = 1 OR `id` = 2)
    ORDER BY `date`
    DESC LIMIT 1,10;
```

### Insert data

```php
    // Include class
    include "query.class.php";

    // Create instance
    $query = new Query();

    $query->insert(array("'slug'", "'content content'", "'tag1, tag2'", "'title post'", 1, 2));
    $query->table("blog_posts");
    $query->columns(array("slug", "content", "tags", "title", "author_id", "category"));

    echo $query->build();
```

Returns

```sql
    INSERT INTO `blog_posts`
        (`slug`, `content`, `tags`, `title`, `author_id`, `category`)
    VALUES ('slug','content content','tag1, tag2','title post',1,2)
    WHERE (`slug` = 'slugnew');
```

### Update data

```php
    // Include class
    include "query.class.php";

    // Create instance
    $query = new Query();

    $query->update(array("'slugnew'", "'New title'"));
    $query->table("blog_posts");
    $query->columns(array("slug", "title"));
    $query->where(array("`slug` = 'prueba'"));
    $query->orWhere(array("`id` = 7", "`id` = 4"));

    echo $query->build();
```

Returns

```sql
    UPDATE `blog_posts`
    SET `slug`='slugnew', `title`='New title'
    WHERE (`slug` = 'prueba') AND (`id` = 7 OR `id` = 4);
```

### Delete data

```php
    // Include class
    include "query.class.php";

    // Create instance
    $query = new Query();

    $query->delete();
    $query->table("blog_posts");
    $query->columns(array("id"));
    $query->where(array("`slug` = 'slugnew'"));

    echo $query->build();
```

Returns

```sql
    DELETE
    FROM `blog_posts`
    WHERE (`slug` = 'slugnew');
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
