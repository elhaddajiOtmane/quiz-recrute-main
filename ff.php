// Combine first_name and last_name to create the name
$name = $request['first_name'] . ' ' . $request['last_name'];

// Create the user with the name
$user = User::create([
    'first_name' => $request['first_name'],
    'last_name' => $request['last_name'],
    'name' => $name, // Insert the combined name
    'date_of_birth' => $request['date_of_birth'],
    'desired_position' => $request['desired_position'],
    'CV' => $request['CV'],
    'city' => $request['city'],
    'cover_letter' => $request['cover_letter'],
    'comments' => $request['comments'],
    'email' => $request['email'],
    'password' => bcrypt($request['password']),
    'mobile' => $request['mobile'],
]);
