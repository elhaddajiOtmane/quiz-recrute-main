

# Candidate API Endpoint Documentation

This documentation provides details on how to use the Candidate API endpoint to add a new candidate to the database.

## Table of Contents

- [Candidate API Endpoint Documentation](#candidate-api-endpoint-documentation)
  - [Table of Contents](#table-of-contents)
  - [Endpoint Details](#endpoint-details)
  - [Request Format](#request-format)

## Endpoint Details

- **URL**: `http://127.0.0.1:8000/api/candidate`
- **Method**: `POST`
- **Authentication**: Not required (You may include authentication if needed)

## Request Format

- **Headers**: Include appropriate headers if required (e.g., `Content-Type: application/json`).

- **Body**: The request body should contain JSON data with the following fields:

  ```json
  {
    "first_name": "string (required)",
    "last_name": "string (required)",
    "date_of_birth": "date (required, format: YYYY-MM-DD)",
    "desired_position": "string (required)",
    "CV": "string (required, Base64 encoded)",
    "city": "string (required)",
    "cover_letter": "string (required)",
    "comments": "string (optional)",
    "name": "string (required, combination of first_name and last_name)",
    "email": "string (required, unique email address)",
    "password": "string (required, hashed password)",
    "mobile": "string (required)",
    "address": "string (optional)",
    "role": "string (optional, default: 'c')",
    "remember_token": "string (optional)",
    "application_date": "date (optional, format: YYYY-MM-DD)"
  }
