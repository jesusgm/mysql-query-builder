# mysql-query-builder

Class php for build mysql querys

## Status

- For now only select querys can be created
- Insert, update, delete querys will be added soon
- Join option will be added soon

## Installation

Clone or download this repository and include or require the query.class.php to use it

```php
include "query.class.php";
```

## Usage

```php
    // Include class
    include "query.class.php";

    // Create instance
    $query = new Query();

    $query->select();   //Type of query: select() || update() || insert() || delete()
    $query->table("posts"); // Set the table
    $query->columns(array("id", "title", "slug"));  // Set the columns to return. Default *
    $query->where(array("title LIKE '%keywordtofind%'"));   // Set query filter
    $query->limit("1,10");  // Set limit of results or paginate
    $query->order("date DESC"); // Set order of result

    echo $query->build();   // Build and returns a query string
```

## License

[MIT](https://choosealicense.com/licenses/mit/)
