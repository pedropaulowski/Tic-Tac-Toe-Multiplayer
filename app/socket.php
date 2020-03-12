<?php


namespace MyApp;


use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Socket implements MessageComponentInterface {

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;

    }

    public function onOpen(ConnectionInterface $conn) {

        // Store the new connection in $this->clients
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";

        $conn->send( "$conn->resourceId" );



    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $jogada = $msg;
        foreach ( $this->clients as $client ) {
            if($from->resourceId != $client->resourceId)
                $client->send($jogada);
        }
    }


    public function onClose(ConnectionInterface $conn) {
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->send($e->getMessage());
    }
}