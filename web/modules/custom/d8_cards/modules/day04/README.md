# D8 Cards - Day 04

This submodule attempts to complete the activity card for [Day 04](https://www.d8cards.com/sites/default/files/2016-05/Day%2004%20-%20Migration%20101-rev05132016.pdf) of the [Drupal 8 Activity Cards](https://www.d8cards.com/). There is also a solution to the bonus exercise.

### Usage

To see this in action firstly enable this module from the Extend page. Once enabled a new Migration group becomes available for import. To run the migrations you can use drush:

````drush mi --group=day04````

The above command will import the Movies, Actors, and Genre's with required references between them. I had to update the movies csv file to add double quotes around the genres. I did this to get Migrate to treat each of them as a separate entity during import.