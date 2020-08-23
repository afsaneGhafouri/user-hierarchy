# User hierarchy


In our system each user belongs to a user-group with a defined set of permissions.
We name such a group "Role". A certain role (unless it is the root) must have a parent role to whom it reports to. 

In this approach, we define a single `Role` class which accept a dynamic level for each role.

##### Pros

- This way is more suitable for cases which the frequency of roles changing is more.

## Requirements

 - PHP >= 7.4
 
## Installation

To make the project up and running, run this command:

```
composer install
```

## Test

To run the tests, execute this command:

```
vendor/bin/phpunit -c phpunit.xml
```

