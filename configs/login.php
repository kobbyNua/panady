<?php
class Login
{
    private $conn;

    public function __construct()
    {
        // It's better to reuse the existing database connection
        // from db-configs.php rather than creating a new one.
        // This assumes you have a Database class that establishes the connection.
        $database = new Database();
        $this->conn = $database->conn;
    }

    /**
     * Verifies user credentials and starts a session on success.
     *
     * @param string $username The user's username.
     * @param string $password The user's password.
     * @return bool True on successful login, false otherwise.
     */
    public function login($username, $password)
    {
        try {
            // IMPORTANT: This code assumes you are storing hashed passwords in your database.
            // Use password_hash('your_password', PASSWORD_DEFAULT) to create them.
            $stmt = $this->conn->prepare("SELECT id, username, password FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password against the stored hash
            if ($user && password_verify($password, $user['password'])) {
                // Password is correct, start the session.
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                return true;
            }

            return false; // User not found or password incorrect.
        } catch (PDOException $e) {
            // In a production environment, you should log this error instead of echoing it.
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * Logs the user out by destroying the session completely.
     */
    public function logout()
    {
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
    }

}