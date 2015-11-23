<?php
/**
 * A client is typically an anonymous user that can enter an appointment
 * preference and enter that preference but has no real information other
 * than a passkey that is emailed to them.
 */
class Client extends DataType {
    const TableName = 'client';

    /**
     * Constructs with potential that the client may not have a key.
     */
    public function __construct( $args ) {
        // Check if the arguments are singular.
        if ( ! is_array( $args ) ) {
            $args = array( 'email' => $args );
        }

        // Call parent constructor.
        parent::__construct( $args );

        // Generate a new key for the item.
        if ( ! $this->getDataVar( 'hash' ) ) {
            $this->generateNewKey();
        }
    }

    /**
     * Returns the appointment
     */
    public function getAppointment() {
        $aid    = $this->getDataVar( 'appid' );
        $result = Database::select( array( '*' ), Appointment::TableName, array( 'id' => $aid ) );

        return isset( $result[0] ) ? $result[0] : null;
    }

    public function getAppointmentGroup() {
        $agid   = $this->getAppointment()->getDataVar( 'appgroupid' );
        $result = Database::select( array( '*' ), AppointmentGroup::TableName, array( 'id' => $agid ) );

        return isset( $result[0] ) ? $result[0] : null;
    }


    /**
     * Get the user that has requested this client.
     */
    public function getUser() {
        $uid = $this->getAppointmentGroup()->getDataVar( 'userid' );
        return UserDatabase::getUser( array( 'id' => $uid ) );
    }

    /**
     * Create a new key.
     */
    public function generateNewKey() {
        $key = hash( 'sha256', uniqid( DB_TABLE_PREFIX ) );
        $this->setDataVar( 'hash', $key );
    }
}
