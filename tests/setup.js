import { beforeAll, afterAll, afterEach } from "vitest";
import { setupServer } from 'msw/node'
// import { rest } from 'msw'
// para la versión actual de "msw", ya no se emplea REST sino HTTP
import { http } from "msw";

const habits = {
    data: [
        {
            name: 'Beber agua',
            times_per_day: 3,
            executions_count: 1,
        },
    ],
}

export const requestHandlers = [
    http.get('http://localhost:3000/api/habits', (req, res, ctx) => {
        return res(ctx.status(200), ctx.json(habits))
    })
]

const server = setupServer(...requestHandlers)

beforeAll(() => server.listen({ onUnhandledRequest: 'error' }))

afterAll(() => server.close())

afterEach(() => server.resetHandlers())
