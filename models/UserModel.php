<?php

require_once APP_PATH . "/../application/Model.php";
require_once APP_PATH . "/../entity/User.php";

class UserModel extends Model
{

    public function getUser($id)
    {
        $out = null;
        $sql = 'SELECT * FROM user WHERE id = "' . $id . '"';

        $result = mysqli_query($this->_db, $sql);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $object = new User;
                $object->setId($row["id"]);
                $object->setName($row["name"]);
                $object->setCode($row["code"]);
                $object->setDni($row["dni"]);

                $out = $object;
            }
        }

        mysqli_close($this->_db);

        return $out;
    }

    public function listUser()
    {
        $out = [];
        $sql = 'SELECT * FROM user ORDER BY id DESC';

        $result = mysqli_query($this->_db, $sql);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {
                $object = new User;
                $object->setId($row["id"]);
                $object->setName($row["name"]);
                $object->setCode($row["code"]);
                $object->setDni($row["dni"]);

                $out[] = $object;
            }
        }

        mysqli_close($this->_db);

        return $out;
    }

    public function create(User $user)
    {
        $sql = 'INSERT INTO user (name, code, dni) VALUES ("'. $user->getName().'", "'. $user->getCode().'", "'. $user->getDni().'")';

        $result = mysqli_query($this->_db, $sql);

        mysqli_close($this->_db);

        return $result;
    }

    public function edit(User $user)
    {
        $sql = 'UPDATE user SET name="'. $user->getName().'", code="'. $user->getCode().'", dni="'. $user->getDni().'" WHERE id="'. $user->getId().'"';

        $result = mysqli_query($this->_db, $sql);

        mysqli_close($this->_db);

        return $result;
    }

    public function delete(User $user)
    {
        $sql = 'DELETE FROM user WHERE id = "' . $user->getId() . '"';

        $result = mysqli_query($this->_db, $sql);

        mysqli_close($this->_db);

        return $result;
    }

}