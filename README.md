
# Eloquent: Relationships student and Candidate

## Eloquent: Relationships Documentation

This documentation explains the relationship between two tables in our Laravel application: "Candidates" and "Students," using Eloquent relationships.

## Introduction

In our application, we have two database tables: "Candidates" and "Students." A "Candidate" represents an individual in the application's recruitment process, while a "Student" represents someone who has been accepted and enrolled.

## Eloquent Relationship

We have established a one-to-one relationship between these two tables using Eloquent, Laravel's built-in Object-Relational Mapping (ORM) system. This relationship allows us to associate a "Candidate" with a "Student" and vice versa.

### Defining the Relationship

We've defined the relationship in our model files as follows:

#### Candidate Model (`Candidate.php`)

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    // ...

    public function student()
    {
        return $this->hasOne(Student::class);
    }
}

```
## Usage Examples

With the one-to-one relationship between "Candidates" and "Students" in place, here are some examples of how you can use it:

### Retrieve the Student Associated with a Candidate

To retrieve the student associated with a candidate, you can use the following code:

```php
$student = $candidate->student;
```
```php
$candidate = $student->candidate;
```

```php
$candidatesWithStudents = Candidate::has('student')->get();

```

```php
$candidate = Candidate::create([
    // Candidate data
]);

$student = $candidate->student()->create([
    // Student data
]);

```

```php
$studentName = $candidate->student->name;

```

```php
if ($candidate->student) {
    // Candidate has a student
} else {
    // Candidate does not have a student
}

```

