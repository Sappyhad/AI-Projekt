<?php

namespace App\Controller;
use App\Exception\NotFoundException;
use App\Model\Room;
use App\Service\Router;
use App\Service\Templating;

class RoomController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $rooms = Room::findAll();
        $html = $templating->render('building/edit-room-index.html.php', [
            'rooms' => $rooms,
            'router' => $router,
        ]);
        return $html;
    }

    public function roomInfo(int $roomId, Templating $templating, Router $router): ?string
    {
        if (!$roomId){
            $room = null;
        } else {
            $room = Room::find_by_name($roomId);
            if (!$room) {
                $room = null;
            }
        }

        $html = $templating->render('building/roomInfo.html.php', [
            'room' => $room,
            'router' => $router,
        ]);
        return $html;
    }

    public function editRoom(int $roomId, ?array $requestRoom, Templating $templating, Router $router): ?string
    {
        $room = Room::find($roomId);
        if (! $room) {
            throw new NotFoundException("Missing rooms with id $roomId");
        }

        if ($requestRoom) {
            $room->fill($requestRoom);
            // @todo missing validation
            $room->save();

            $path = $router->generatePath('building-index');
            $router->redirect($path);
            return null;
        }

        $html = $templating->render('building/edit-room.html.php', [
            'room' => $room,
            'router' => $router,
        ]);
        return $html;
    }
    public function addRoom(?array $requestRoom, Templating $templating, Router $router): ?string
    {
        if ($requestRoom) {
            $room = Room::fromArray($requestRoom);
            // @todo missing validation
            $room->save();

            $path = $router->generatePath('building-index');
            $router->redirect($path);
            return null;
        } else {
            $room = new Room();
        }
        $html = $templating->render('building/add-room.html.php', [
            'room' => $room,
            'router' => $router,
        ]);
        return $html;
    }
    public function deleteRoom(int $roomId, Router $router): ?string
    {
        $room = Room::find($roomId);
        if (! $room) {
            throw new NotFoundException("Missing post with id $roomId");
        }

        $room->delete();
        $path = $router->generatePath('building-index');
        $router->redirect($path);
        return null;
    }   
}