## Description
A small laravel voting app created as a coding challenge for KollwitzOwen, completed by Edward Cooper

## Notes
- Used getbootstrap.com for css/js

## To-dos & what I would do differently in the future
- Improve the sorting system in the results page
    - Secondary order by for image sort, order by name or image count
    - Improve/remove routing to sort
    - Write JS to order the table
- Add a "Vote submitted!" notification
- Create tests first/earlier on (would do now that I have a better understanding of Laravel)
- Expand tests for things like 'first_image_labelled_1', 'variables_loaded_correctly' & 'sorting_order'
- Better separate unit tests & feature tests
- Investigate better ways of ignoring white-space and case in castVote, preferably using Eloquent commands other than whereRaw
- Use strict data types
- Make it so that running tests doesn't wipe the site database
- Remove sanctum 'personal_access_tokens' table
- Use something like xdebug to check code coverage
- Clean up unused files created by Laravel by default

