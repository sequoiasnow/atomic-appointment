<?php

class Appointment extends DataType {
    const TableName = 'appointment';

    /**
     * Returns the number of filled clients in this appointment.
     *
     * @return int
     */
    public function getNumbFilled() {
        $id = $this->getDataVar( 'id' );
        $results = Database::select( array( '*' ), Client::TableName, array( 'appid' => $id ) );

        return count( $results );
    }

    /**
     * Returns the percentage of the appointment filled.
     *
     * @return double
     */
    public function getPercentFilled() {
        return $this->getNumbFilled() / $this->getDataVar( 'maxclients' );
    }
}
