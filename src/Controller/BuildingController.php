<?php

namespace App\Controller;
use App\Exception\NotFoundException;
use App\Model\Room;
use App\Service\Router;
use App\Service\Templating;

class BuildingController
{
    public function indexAction(Templating $templating, Router $router): ?string
    {
        $html = $templating->render('building/building-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }


    public function indexBuildingAction(Templating $templating, Router $router, int $buildingNumber): ?string
    {
        $html = $templating->render('building/wi' . $buildingNumber . '-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }

    public function indexFloorInBuilding(Templating $templating, Router $router, int $buildingNumber, int $floorNumber): ?string
    {
        $html = $templating->render('building/WI' . $buildingNumber .'/wi' . $buildingNumber .
            '-floor' . $floorNumber .'-index.html.php', [
            'router' => $router,
        ]);
        return $html;
    }

    public function roomInfoAction(int $roomId, Templating $templating, Router $router): ?string
    {
        $room = Room::find($roomId);
        if (! $room) {
            throw new NotFoundException("Missing room with id $roomId");
        }

        $html = $templating->render('building/roomInfo.html.php', [
            'room' => $room,
            'router' => $router,
        ]);
        return $html;
    }

    public function editRoomIndexAction(int $roomId, ?array $requestRoom, Templating $templating, Router $router): ?string
    {
        $room = Room::find($roomId);
        if (! $room) {
            throw new NotFoundException("Missing room with id $roomId");
        }

        if ($requestRoom) {
            $room->fill($requestRoom);
            // @todo missing validation
            $room->save();

            $path = $router->generatePath('roomInfo-index');
            $router->redirect($path);
            return null;
        }

        $html = $templating->render('building/edit-room.html.php', [
            'room' => $room,
            'router' => $router,
        ]);
        return $html;
    }


}