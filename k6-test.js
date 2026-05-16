import http from 'k6/http';
import { check } from 'k6';

export const options = {

    vus: 20,

    iterations: 100,

};

export default function () {

    const payload = JSON.stringify({
        item_id: 1,
        tipe: 'keluar',
        qty: 1,
        user_id: 1,
    });

    const params = {
        headers: {
            'Content-Type': 'application/json',
        },
    };

    const res = http.post(
        'https://bharata-test.bidev.my.id/api/transactions',
        payload,
        params
    );

    check(res, {
        'status is 200 or 422': (r) =>
            r.status === 200 || r.status === 422,
    });

}