import { beforeAll, afterAll, afterEach } from "vitest";
import { setupServer } from 'msw/node'
// import { rest } from 'msw'
// para la versión actual de "msw", ya no se emplea REST sino HTTP
import { http, HttpResponse } from "msw";

const habits = {
    data: [
        {
            name: 'Beber agua',
            times_per_day: 3,
            executions_count: 1,
        },
    ],
}

const validationErrors = {
    errors: {
        name: [
            'The name field is required.'
        ],
        times_per_day: [
            'The times per day field is required.'
        ],
    },
}

export const requestHandlers = [
    // rest.get('http://localhost:3000/api/habits', (req, res, ctx) => {
    //     return res(ctx.status(200), ctx.json(habits))
    // }),
    // o
    // rest.get('/api/habits', (req, res, ctx) => {
    //     return res(ctx.status(200), ctx.json(habits))
    // }),
    // ----------------------------------------------------------------
    // http.get('http://localhost:3000/api/habits', () => {
    //     return HttpResponse.json(habits, {
    //         status: 200,
    //     })
    // }),
    // o
    http.get('/api/habits', () => {
        return HttpResponse.json(habits, {
            status: 200,
        })
    }),

    // rest.post('/api/habits/:habit/execution', (req, res, ctx) => {
    //     return res(ctx.status(200), ctx.json(habits))
    // }),
    http.post('/api/habits/:habit/execution', () => {
        return HttpResponse.json({}, {
            status: 200,
        })
    }),

    // rest.post('/api/habits', async (req, res, ctx) => {
    //     const { name, times_per_day } = await req.json()
    //     // ini :: considerando validaciones también ::::::::::::::
    //     if (name == '' || times_per_day == '') {
    //         return res(ctx.status(422), ctx.json(validationErrors))
    //     }
    //     // fin :::::::::::::::::::::::::::::::::::::::::::::::::::
    //     habits.data.push({
    //         id: habits.data.length + 1,
    //         name: name,
    //         times_per_day: times_per_day,
    //         executions_count: 0,
    //     })
    //     return res(ctx.status(200), ctx.json(habits))
    // }),
    http.post('/api/habits', async ({ request }) => {
        const habit = await request.json()
        const { name, times_per_day } = habit
        // ini :: considerando validaciones también ::::::::::::::
        if (name == '' || times_per_day == '') {
            return HttpResponse.json(validationErrors, {
                status: 422,
            })
        }
        // fin :::::::::::::::::::::::::::::::::::::::::::::::::::
        habits.data.push({
            id: habits.data.length + 1,
            name: name,
            times_per_day: times_per_day,
            executions_count: 0,
        })
        return HttpResponse.json(habits, {
            status: 200,
        })
    }),
]

const server = setupServer(...requestHandlers)

beforeAll(() => server.listen({ onUnhandledRequest: 'error' }))

afterAll(() => server.close())

afterEach(() => server.resetHandlers())
