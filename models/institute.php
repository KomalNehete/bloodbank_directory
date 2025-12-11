<?php
class Institute {
    public static function getAll($conn) {
        $sql = "SELECT * FROM institutes";
        $result = $conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
