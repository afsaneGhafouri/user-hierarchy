# User hierarchy


In our system each user belongs to a user-group with a defined set of permissions.
We name such a group "Role". A certain role (unless it is the root) must have a parent role to whom it reports to. 

I identified two different approaches to implement this system:

 - Define a single `Role` class

 - Define each individual role as a type of `Role` class. Please checkout on [feature/approach-2](/../../tree/feature/approach-2) branch to see the logic as well as running the tests.
   
   In this approach, we define each role as a type of `Role` class which each of them define its own level.
   For instance, in the case we have `Admin`,`Supervisor` and `Employee` levels, we will have these classes for each role:
   
   - `SystemAdministrator`
   - `Supervisor`
   - `Employee`
   
   ##### Pros
    
   - This approach helps us to define roles in a well-structured format.
   - This way is more suitable for cases which the frequency of roles changing is less
    
   ##### Cons
   
   - We might need to update the code base each time we add/remove the roles.
   - This approach does not fit with systems which their roles change more frequent.

## Requirements

 - PHP >= 7.4
 
## Installation

To make the project up and running, run this command:

```
composer install
```
