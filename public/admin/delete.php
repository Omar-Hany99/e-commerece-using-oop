<?php


include '../../src/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    foreach ($_POST['selected_products'] as $selected) {
        $selected = json_decode($selected, true);

        try {
            $cms->db->beginTransaction();
            $cms->getProduct()->deleteProduct($selected['id']);
            $cms->{'get' . $selected['type']}()->delete($selected['id']);
            $cms->db->commit();
        } catch (PDOException $e) {
            $cms->db->rollback();
            throw $e;
        }
    }
    header('Location: ../index.php');
    exit;

}