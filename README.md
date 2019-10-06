# mysql-query-builder

Class php for build mysql querys

## Status

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="128" height="20"><linearGradient id="b" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><clipPath id="a"><rect width="128" height="20" rx="3" fill="#fff"/></clipPath><g clip-path="url(#a)"><path fill="#555" d="M0 0h67v20H0z"/><path fill="#e05d44" d="M67 0h61v20H67z"/><path fill="url(#b)" d="M0 0h128v20H0z"/></g><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="110"> <text x="345" y="150" fill="#010101" fill-opacity=".3" transform="scale(.1)" textLength="570">completed</text><text x="345" y="140" transform="scale(.1)" textLength="570">completed</text><text x="965" y="150" fill="#010101" fill-opacity=".3" transform="scale(.1)" textLength="510">in course</text><text x="965" y="140" transform="scale(.1)" textLength="510">in course</text></g> </svg>

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
