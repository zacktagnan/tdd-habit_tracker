import { beforeAll, afterAll, afterEach } from "vitest";
import { setupServer } from 'msw/node'

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
    rest.get('http://localhost:3000/api/habits', (req, res, ctx) => {
        return res(ctx.status(200), ctx.json(habits))
    })
]

const server = setupServer(...requestHandlers)

beforeAll(() => server.listen({ onUnhandledRequest: 'error' }))

afterAll(() => server.close())

afterEach(() => server.resetHandlers())
